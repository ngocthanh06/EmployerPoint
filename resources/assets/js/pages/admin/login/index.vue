<script>
import { mapGetters } from 'vuex';

export default {

  name: 'AdminLogin',

  data() {
    return {
      ruleForm: {
        email: '',
        password: ''
      },

      rules: {
          email: [
            { required: true, message: 'Please input email', trigger: 'blur' },
            { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] }
          ],
          password: [
            { required: true, message: 'Please input password', trigger: 'blur' },
          ]
        }
    }
  },

  computed: {
    ...mapGetters({
      getAdmin: 'adminAuth/getAdmin'
    })
  },

  methods: {
    submitLogin(e) {
      this.$refs['formData'].validate((valid) => {
        if (valid) {
          this.login();
        } else {
          return false;
        }
      });
    },

    login() {
      this.$store.dispatch( 'adminAuth/authenticate', this.ruleForm );

         
    }
  },


  template: require('./Login.html'),
};
</script>

<style lang="scss" scoped src="./Login.scss"></style>
