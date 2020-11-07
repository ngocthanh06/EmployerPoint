<script>
import moment from 'moment';
import { transError } from '../../../../store/modules/helpers';

export default {
    name: 'point',

     data() {
      return {
        pickerOptions: {
          disabledDate(time) {
            return time.getTime() > Date.now();
          },
          shortcuts: [{
            text: 'Today',
            onClick(picker) {
              picker.$emit('pick', new Date());
            }
          }, {
            text: 'Yesterday',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24);
              picker.$emit('pick', date);
            }
          }, {
            text: 'A week ago',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit('pick', date);
            }
          }]
        },
        datePicked: moment().format('yyyy-MM-DD'),
        infomation: [],
        options: [],
        point: '',
        criteria_id: '',
        checkPoint: true
      };
    },

    created() {
        this.getCriterias();
        this.getPoint();
    },

    updated() {
        this.handleCriteriasId();
    },

    methods: {
        getPoint() {
            this.$store.dispatch('admin/getPoint', { id: this.$route.params.id, date: this.datePicked })
                .then(response => {
                    if (response.status) {
                        this.checkPoint = false;

                        return this.infomation = response.data;
                    }

                    this.checkPoint = true;

                    return this.infomation = {};
                })
        },

        handleCriteriasId() {
            this.options.map((value) => {
                if ( value.id === this.criteria_id )
                    return this.point = value.point;
            });
        },

        getCriterias() {
            this.$store.dispatch('admin/getCriterias')
            .then(response => {
                this.options = response;
            })
        },

        successPoint() {
            this.$store.dispatch('admin/successPoint', { user_id: this.$route.params.id, attendance: this.datePicked, criteria_id: this.criteria_id })
            .then(response => {
                if (response.status) {
                    this.getPoint()

                    return this.$message({
                        message: 'Congrats, successfully.',
                        type: 'success'
                    });
                }

                return this.$message.error(transError(response.message).criteria_id);
            })
        }
    },

    template: require('./Point.html'),
}
</script>

<style lang="scss" scoped src="./Point.scss"></style>
