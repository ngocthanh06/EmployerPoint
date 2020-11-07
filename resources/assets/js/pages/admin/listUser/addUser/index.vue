<script>
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
    methods: {
        submitForm() {
          this.$refs['ruleForm'].validate((valid) => {
              if (valid) {
                  this.addUser();
              } else {
                  return false;
              }
          });
        },

        resetForm() {
          this.$refs['ruleForm'].resetFields();
        },

        addUser() {
          this.$store.dispatch('admin/addUser', this.ruleForm)
            .then(response => {
              if (response) {
                this.resetForm();
                this.$router.push({'name': 'ListUser'});
                return this.$message({
                  message: 'Congrats, user added successfully.',
                  type: 'success'
                });
              }

              return this.$message.error('Oops, User add failed.');
            }).catch(error => {
                this.errors = error;
            })
          this.errors = {}
        }
    },

    template: require('./AddUser.html'),
}
</script>

<style lang="scss" scoped src="./AddUser.scss"></style>
