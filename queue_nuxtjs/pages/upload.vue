<template>
  <div
    class="d-flex justify-content-center align-items-center home flex-column"
  >
    <template v-if="progress > 0 && progress < 100">
      <h3>Uploading progress {{ progress }}%</h3>
      <b-progress :max="100" height="20px" class="w-50 mt-2">
        <b-progress-bar
          :value="progress"
          :label="`${progress}%`"
          variant="info"
          striped
          animated
        ></b-progress-bar>
      </b-progress>
    </template>

    <template v-else>
      <b-alert v-if="progress === 100" :show="5" dismissible variant="warning">
        <strong>Great Job!</strong> Uploading had been finished!.
      </b-alert>
      <b-card title="Choose a file to upload" class="text-center">
        <form
          class="d-flex text-left mt-4"
          @submit.prevent="upload"
          enctype="multipart/form-data"
        >
          <div class="custom-file">
            <input
              @change="processFile"
              type="file"
              class="custom-file-input"
              id="validatedCustomFile"
              ref="file"
            />
            <label class="custom-file-label" for="validatedCustomFile"
              >Choose file...</label
            >
          </div>
          <button class="btn btn-info ml-2">Upload</button>
        </form>

        <h5 class="mt-3" v-if="fileData">Selected File: {{ fileData.name }}</h5>
      </b-card>
    </template>
  </div>
</template>

<script>
export default {
  head() {
    return {
      title: "upload",
    };
  },
  data() {
    return {
      fileData: null,
      progress: null,
      batchId: null,
    };
  },

  watch: {
    batchId(val) {
      if (val) {
        this.jobProgress();
        this.progress = null;
      }
    },
  },

  methods: {
    async upload() {
      if (!this.fileData) return alert("Please upload a file!");
      const formData = new FormData();
      formData.append("mycsv", this.fileData);
      // console.log(process.env.API_URL)

      await this.$axios
        .$post(`${process.env.API_URL}/upload`, formData)
        .then((res) => {
          this.batchId = res.id;
          this.fileData = null;
        })
        .catch((err) => console.log(err));
    },
    processFile() {
      this.fileData = this.$refs.file.files[0];
    },
    jobProgress() {
      if (this.batchId !== null) {
        setInterval(() => {
          if (this.progress !== 100) {
            this.$axios
              .$get(`${process.env.API_URL}/batch?id=${this.batchId}`)
              .then((res) => {
                this.progress = res.progress;
              })
              .catch((err) => console.log(err));
          }
        }, 2000);
      }
      return;
    },
  },
  created() {
    this.jobProgress();
  },
};
</script>

<style>
.home {
  min-height: 70vh;
}
</style>
