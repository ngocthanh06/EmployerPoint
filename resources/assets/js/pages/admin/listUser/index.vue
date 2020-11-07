<script>
import { transError } from '../../../store/modules/helpers';

export default {
    data() {
      return {
        tableData: []
      }
    },

    computed: {
    },

    created() {
      this.listUser();
    },

    methods: {
      tableRowClassName({row, rowIndex}) {
        if (rowIndex === 1) {
          return 'warning-row';
        } else if (rowIndex === 3) {
          return 'success-row';
        }
        return '';
      },

      listUser() {
        this.$store.dispatch('admin/listUser')
          .then(response => {
            this.tableData = response.data;
          })
      },

     
    },

    template: require('./ListUser.html'),
}
</script>

<style lang="scss" scoped src="./ListUser.scss"></style
