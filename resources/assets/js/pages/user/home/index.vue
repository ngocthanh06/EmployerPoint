<script>
import moment from 'moment';
import { mapGetters } from 'vuex';

export default {
    name: 'home',

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
        checkPoint: true
      };
    },

    created() {
        this.getPoint();
    },

    computed: {
        ...mapGetters({
            getUser: 'userAuth/getUser'
        })
    },

    methods: {
        getPoint() {
            this.$store.dispatch('userAuth/getPoint', { id: this.getUser.id, attendance: this.datePicked })
                .then(response => {
                    if (response.status) {
                        this.checkPoint = false;

                        return this.infomation = response.data;
                    }

                    this.checkPoint = true;

                    return this.infomation = {};
                })
        },

    },

    template: require('./Home.html'),
}
</script>

<style lang="scss" scoped src="./Home.scss"></style>
