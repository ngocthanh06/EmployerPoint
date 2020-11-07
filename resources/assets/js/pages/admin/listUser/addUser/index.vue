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
        rules: {
          first_name: [
            { required: true, message: 'Please input first name', trigger: 'blur' },
            { min: 3, max: 5, message: 'Length should be 3 to 5', trigger: 'blur' }
          ],
          last_name: [
            { required: true, message: 'Please input last name', trigger: 'blur' },
            { min: 3, max: 5, message: 'Length should be 3 to 5', trigger: 'blur' }
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

        addUser() {
            this.$store.dispatch('admin/addUser', this.ruleForm);
        }
    },

    template: require('./AddUser.html'),
}
</script>

<style lang="scss" scoped src="./AddUser.scss"></style>
