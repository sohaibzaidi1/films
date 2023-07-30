<template>
    <div class="container py-4">
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
                <p class="mb-0"><strong>Rating:</strong> {{ film.rating }}</p>
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
    </div>
  </template>
  <script>
  import Pagination from "vue-pagination-2";
  export default {
    components: {
        Pagination,
    },
    data() {
      return {
        films: [],
        perPage: 1, // Number of films per page
        currentPage: 1, // Current page
        totalFilms: 0,
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
  
    },
  };
  </script>
  