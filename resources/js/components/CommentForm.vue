<!-- CommentForm.vue -->
<template>
    <div v-if="$auth.check()">
      <h3>Post a Comment</h3>
      <form @submit.prevent="submitComment">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" v-model="name" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea v-model="comment" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
      </form>
    </div> 
    <div v-else>
            <!-- Show content for guests or non-authenticated users -->
            <h3>Please log in to post comment.</h3>
    </div>
  </template>
  
  <script>
  export default {
    props: {
        filmId: {
            type: Number,
            required: true,
        },
    },
    data() {
      return {
        film_id: 0,
        comment: "",
        name: "",
      };
    },
    methods: {
      submitComment() {
        // Emit an event to the parent component to handle the comment submission
        this.$emit("comment-posted", {
          film_id: this.filmId,
          comment: this.comment,
          name: this.name,
        });
  
        // Clear the form fields after submission
        this.name = "";
        this.comment = "";
      },
    },
  };
  </script>
  