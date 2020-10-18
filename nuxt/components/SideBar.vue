<template>
  <div class="sidebar-page">
    <section class="sidebar-layout">
      <b-sidebar
        position="static"
        :expand-on-hover="expandOnHover"
        :reduce="reduce"
        type="is-light"
        open
      >
        <div class="p-1">
          <div class="block">
            <img
              src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
              alt="Lightweight UI components for Vue.js based on Bulma"
            />
          </div>
          <b-menu class="is-custom-mobile">
            <b-menu-list>
              <b-menu-item active expanded icon="settings" label="Groups">
                <b-menu-item icon="group" :label="group.name" v-for="group in chatGroup" :key="group.id"></b-menu-item>
                <modal-component @append-data="appendGroup"></modal-component>
              </b-menu-item>
            </b-menu-list>
            <b-menu-list label="その他">
              <b-menu-item icon="logout" label="Logout" @click="logout"></b-menu-item>
            </b-menu-list>
          </b-menu>
        </div>
      </b-sidebar>
    </section>
  </div>
</template>

<script>

import ModalComponent from "@/components/ModalComponent";

export default {
  props: ['chatGroup'],
  components: {
    ModalComponent
  },
  data() {
    return {
      expandOnHover: false,
      mobile: "reduce",
      reduce: false,
    }
  },
  created(){
  },
  methods: {
    async logout() {
      await this.$store.dispatch('user/logout')
        .then(() => {
          this.$router.push({name: "user-login"})
        })
    },
    appendGroup(value) {
      this.chatGroup.push(value)
    }
  }
}
</script>

<style lang="scss">
.p-1 {
  padding: 1em;
}

.sidebar-page {
  display: flex;
  flex-direction: column;
  width: 100%;
  min-height: 100%;
  // min-height: 100vh;
  .sidebar-layout {
    display: flex;
    flex-direction: row;
    min-height: 100%;
    // min-height: 100vh;
  }
}

@media screen and (max-width: 1023px) {
  .b-sidebar {
    .sidebar-content {
      &.is-mini-mobile {
        &:not(.is-mini-expand),
        &.is-mini-expand:not(:hover) {
          .menu-list {
            li {
              a {
                span:nth-child(2) {
                  display: none;
                }
              }

              ul {
                padding-left: 0;

                li {
                  a {
                    display: inline-block;
                  }
                }
              }
            }
          }

          .menu-label:not(:last-child) {
            margin-bottom: 0;
          }
        }
      }
    }
  }
}

@media screen and (min-width: 1024px) {
  .b-sidebar {
    .sidebar-content {
      &.is-mini {
        &:not(.is-mini-expand),
        &.is-mini-expand:not(:hover) {
          .menu-list {
            li {
              a {
                span:nth-child(2) {
                  display: none;
                }
              }

              ul {
                padding-left: 0;

                li {
                  a {
                    display: inline-block;
                  }
                }
              }
            }
          }

          .menu-label:not(:last-child) {
            margin-bottom: 0;
          }
        }
      }
    }
  }
}
</style>
