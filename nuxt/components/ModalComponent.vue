<template>
  <section>
    <button class="button is-primary is-medium"
            @click="isComponentModalActive = true">
      グループの作成
    </button>
    <b-modal
      v-model="isComponentModalActive"
      has-modal-card
      trap-focus
      :destroy-on-hide="false"
      aria-role="dialog"
      aria-modal>
      <template #default="props">
        <modal-form @close="props.close" @send-data="relayData"></modal-form>
      </template>
    </b-modal>
  </section>
</template>

<script>
import ModalForm from "@/components/ModalFormComponent";

export default {
  components: {
    ModalForm
  },
  data() {
    return {
      isComponentModalActive: false,
    }
  }, methods: {
    relayData(value) {
      this.$emit('append-data', value)
    }
  }
}
</script>
