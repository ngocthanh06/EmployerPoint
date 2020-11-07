<script>
import { mapGetters } from 'vuex';

export default {

  name: 'UserLogin',

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
      getUser: 'userAuth/getUser'
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
      this.$store.dispatch( 'userAuth/authenticate', this.ruleForm );
      if (this.getUser) {
        this.$router.push({ name: 'home' })
      }
    }
  },


  template: require('./Login.html'),
};
</script>

<style lang="scss" scoped src="./Login.scss"></style>
