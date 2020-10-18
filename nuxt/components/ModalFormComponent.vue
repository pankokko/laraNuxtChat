<template>
  <form action="">
    <div class="modal-card" style="width: auto">
      <header class="modal-card-head">
        <p class="modal-card-title">Create Group</p>
        <button
          type="button"
          class="delete"
          @click="$emit('close')"/>
      </header>
      <section class="modal-card-body">
        <b-field label="Group Name">
          <b-input
            type="text"
            v-model="obj.groupName"
            placeholder="New group name"

            required>
          </b-input>
        </b-field>
      </section>
      <footer class="modal-card-foot">
        <button class="button" type="button" @click="$emit('close')">Close</button>
        <button class="button is-primary" @click="makeGroup($event, obj.groupName)">Create</button>
      </footer>
    </div>
  </form>

</template>

<script>

export default {
  data() {
    return {
      obj: {
        groupName: '',
      }
    }
  },
  created() {
  },
  methods: {
    async makeGroup(event) {
      event.preventDefault()
      const response = await this.$api.createGroup({name: this.obj.groupName});
      const { data } = response.data.original
      this.$emit('send-data', data)
      this.$emit('close')
      this.obj.groupName = ''
    }
  }
}

</script>
