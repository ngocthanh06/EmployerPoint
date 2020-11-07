<script>
import { transArray } from '../../../../store/modules/helpers';

export default {
    data() {
      return {
        ruleForm: {
          first_name: '',
          last_name: '',
          phone: '',
          email: ''
        },
        errors: {},
        rules: {
          first_name: [
            { required: true, message: 'Please input first name', trigger: 'blur' },
            { min: 3, message: 'Length should be 3 above', trigger: 'blur' }
          ],
          last_name: [
            { required: true, message: 'Please input last name', trigger: 'blur' },
            { min: 3, message: 'Length should be 3 above', trigger: 'blur' }
          ],
          phone: [
            { required: true, message: 'Please input first name', trigger: 'blur' },
          ],
          email: [
            { required: true, message: 'Please input email', trigger: 'blur' },
            { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] }
          ],
        }
      };
    },

    created() {
      this.getUser();
    },

    methods: {

        getUser() {
          this.$store.dispatch('admin/getUser', { id: this.$route.params.id })
          .then(response => {
            this.ruleForm = transArray(response.data);
          })
        },

        submitForm() {
          this.$refs['ruleForm'].validate((valid) => {
              if (valid) {
                  this.editUser();
              } else {
                  return false;
              }
          });
        },

        resetForm() {
          this.$refs['ruleForm'].resetFields();
        },

        editUser() {
          this.$store.dispatch('admin/editUser', this.ruleForm)
            .then(response => {
              if (response) {
                this.resetForm();
                this.$router.push({'name': 'ListUser'});
                return this.$message({
                  message: 'Congrats, user edited successfully.',
                  type: 'success'
                });
              }

              return this.$message.error('Oops, User edit failed.');
            }).catch(error => {
                this.errors = error;
            })
          this.errors = {}
        }
    },

    template: require('./EditUser.html'),
}
</script>

<style lang="scss" scoped src="./EditUser.scss"></style>
