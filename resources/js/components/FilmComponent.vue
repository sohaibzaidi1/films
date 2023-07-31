<template>
    <div class="container py-4">
      <div v-if="$auth.check()">
        <button @click="logout" class="btn btn-danger" >Logout</button>
        <button @click="redirectToCreate" class="btn btn-primary">Create</button>
      </div>
      <div v-else>
        <button @click="redirectToLogin" class="btn btn-primary" >Login</button>
        <button @click="redirectToSignup" class="btn btn-primary" >Signup</button>
      </div>
        
        

      <h1 class="text-center mb-4">Film List</h1>
      <div v-if="films.length === 0" class="text-center">No films found.</div>
      <div v-else>
        <div class="row">
          <div
            v-for="film in films"
            :key="film.id"
            class="col-lg-4 col-md-6 mb-4"
          >
            <div class="card">
              <div
                v-for="(image, index) in film.photo"
                :key="index"
                class="card-img-top"
              >
                <a :href="image.photo" data-lightbox="film-gallery">
                  <img :src="image.photo" class="img-fluid" alt="Film Image" />
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ film.name }}</h5>
                <p class="card-text">{{ film.description }}</p>
                <p class="mb-0">
                  <strong>Release Date:</strong> {{ film.release_date }}
                </p>
                <p class="mb-0"><strong>Rating:</strong> {{ film.rating }} / 5</p>
                <p class="mb-0">
                  <strong>Ticket Price:</strong> {{ film.ticket_price }}
                </p>
                <p class="mb-0">
                  <strong>Country:</strong>
                  <span v-for="country in film.country">
                    {{ country.name }}
                  </span>
                </p>
                <p class="mb-0">
                  <strong>Genres:</strong>
                  <span
                    v-for="genre in film.genre"
                    :key="genre.id"
                    class="badge badge-primary mr-1"
                  >
                    {{ genre.name }}
                  </span>
                </p>
              </div>
            </div>
                <comment-form :film-id="film.id" @comment-posted="handleCommentPosted" />
                    <div v-if="film.comments.length > 0">
                    <h4>Comments</h4>
                    <ul>
                        <li v-for="comment in film.comments" :key="comment.id">
                            <strong>{{ comment.name }}</strong>: {{ comment.comment }}
                        </li>
                    </ul>
                    </div>
                    <div v-else>
                    <p>No comments yet. Be the first to post a comment!</p>
                    </div>
                </div>
          </div>

          <div class="col-12">
            <pagination
              :records="totalFilms"
              :per-page="perPage"
              v-model="currentPage"
              @input="fetchFilms"
            ></pagination>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </template>
  <script>
  import Pagination from    "vue-pagination-2";
  import CommentForm from "./CommentForm.vue";
  export default {
    components: {
        Pagination,
        CommentForm,
    },
    data() {
      return {
        films: [],
        perPage: 1, // Number of films per page
        currentPage: 1, // Current page
        totalFilms: 0,
        comments: [],
        film_id: 0
      };
    },
  
    created(){
        this.fetchFilms();
    },
    methods: {
        // Fetch films from the backend API using axios
        fetchFilms(){
            let vm = this;
            axios.get('/api/films',{
                params: {
                page: this.currentPage,
                perPage: this.perPage,
            },
            })
            .then((response) => {
                vm.films = response.data.data.data;
                vm.totalFilms = response.data.data.total;
                vm.currentPage = response.data.data.currentPage
            })
            .catch((error) => {
            console.error('Error fetching films:', error);
            });
        },
        handleCommentPosted(newComment) {
            this.submitComment(newComment)
            // Add the new comment to the existing comments array
            // this.comments.push(newComment);
        },
        async submitComment(comment) {
            try {
                console.log(comment)
                // Make a POST request to your Laravel API endpoint
                const response = await axios.post('/api/comments', {
                    film_id: comment.film_id, // Replace with the actual film ID
                    comment: comment.comment,
                    name: comment.name,
                });

                // Handle the response if needed (e.g., show a success message)
                console.log('Comment submitted successfully:', );
                this.fetchFilms();
                // Clear the comment input after successful submission
                this.comment = '';
            } catch (error) {
                // Handle any errors that occur during the API request
                console.error('Error submitting comment:', error.response.data);
            }
        },
        redirectToLogin() {
            // Redirect to the Laravel login route
            window.location.href = '/login'; // Replace with your Laravel login route
        },
        logout(){
            window.location.href = '/logout';
        },
        redirectToCreate(){
            window.location.href = '/film/create';
        },
        redirectToSignup(){
          window.location.href = '/signup';
        },
    },
  };
  </script>
  