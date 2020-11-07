<template>
  <div id="wrapper">
    <SideBar></SideBar>
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <Header></Header>
          <router-view></router-view>
        <Footer></Footer>
      </div>
    </div>
  </div>
</template>

<script>
import SideBar from '../../layouts/sidebar';
import Header from '../../layouts/components/header';
import Footer from '../../layouts/components/footer'

export default {
    components: {
        SideBar,
        Header,
        Footer
    }
}
</script>

<style lang="scss" scoped src="./Content.scss"></style>
