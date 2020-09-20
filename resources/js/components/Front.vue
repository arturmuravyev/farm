<template>
	<!-- <v-app> -->
		<div class="container m-5">
		    <button v-on:click="loadAnimalKinds" type="button" class="btn btn-primary btn-fab">
				Get Animal Kinds
			</button>
			<div class="d-inline" v-for="kind in animalKinds">
				<img :src="getPic(kind)" v-on:click="grow(kind)" height="32px" class="ml-3">
			</div>
		</div>
	<!-- </v-app> -->
</template>

<script>
	export default {
		data: function() {
			return {
				animalKinds: []
			}
		},

		mounted() {
			//this.loadAnimalKinds();
		},

		methods: {

			getPic: function(kind){
				return 'images/' + kind.kind + '.png';
				console.log('Greet');
			},

			loadAnimalKinds: function() {
				// load API
				axios.get('/api/animal_kinds')
				.then( (response) => {
					console.log('Response = ', response);
					this.animalKinds = response.data.data;
				})
				.catch(function(error){
					console.log(error);					
				});
			},

			grow: function(kind) {

			}
		}
	}
</script>