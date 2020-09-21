<template>
	<!-- <v-app> -->
		<div class="container w-100 m-3" style="background-color: ; height: 100vh;">
		    <button v-on:click="loadAnimalKinds" type="button" class="btn btn-primary btn-fab">
				Get Animal Kinds
			</button>
			<div class="d-inline" v-for="kind in animalKinds">
				<img :src="getPic(kind)" v-if="!kind.hidden" v-on:click="create(kind);" :id="kind.kind" height="32px" class="ml-3 " style="cursor: pointer;">
			</div>

			<div class="vertical-center" style="text-align: center;">
				<div class="d-inline ml-1" v-for="animal in animals" style="margin: 0 auto 0 auto;">
					<img :src="getPic(animal)" :height="getSize(animal)" class="ml-3">
				</div>
			</div>
		</div>
	<!-- </v-app> -->
</template>

<script>
	export default {
		data: function() {
			return {
				animalKinds: [],
				animals: [],
				kinds: [],
			}
		},

		mounted() {
			this.farming();
		},

		methods: {

			getPic: function(kind){
				return 'images/' + kind.kind + '.png';
			},

			getSize: function(animal){
				let size = animal.size;
				let max_size = this.animalKinds.filter( kind => (kind.kind == animal.kind) )[0]['max_size'];

				return (size <= max_size) ? (size + 'px') : (max_size + 'px');
			},

			farming: function(){  
			    setInterval( () => {
			    	console.log('this.animals.length =', this.animals.length);
			    	if(this.animals.length > 0){
			    		for (var i = 0; i < this.animals.length; i++) {
			    			let max_size = this.animalKinds.filter( kind => (kind.kind == this.animals[i].kind) )[0]['max_size'];
			    			let size = this.animals[i].size;
			    			if(size < max_size)
			    			this.age(this.animals[i]['name']);
			    		}
			    	}
			    }, 3000);
			},

			loadAnimalKinds: function() {
				this.animals = [];
				axios.get('/api/animal_kinds')
				.then( (response) => {
					this.animalKinds = response.data.data;
				})
				.catch(function(error){
					console.log(error);					
				});
			},

			create: function(kind) {
				kind['hidden'] = true;

				let name = this.rndStr(7);
				//create animal
				axios.post('/api/animals',{
					"kind": kind.kind,
					"name":name
				})
				.then( (response) => {
					if(response.data.data == 'ok'){
						this.getAnimal(name);
					}else{
						console.log('data is not ok');
					}
				})
				.catch(function(error){
					console.log(error);					
				});
			},

			getAnimal: function(name) {
				// get animal by name
				axios.get('/api/animals/' + name)
				.then( (response) => {
					this.animals.push(response.data[0]);
				})
				.catch(function(error){
					console.log(error);					
				});
			},

			age: function(name) {
				// age animal by name
				axios.post('/api/animals/age', {
					"name": name
				})
				.then( (response) => {
					if(response.data.data == 'ok'){
						this.updateAnimal(name);
					}
				})
				.catch(function(error){
					console.log(error);					
				});
			},

			updateAnimal: function(name) {
				// update animal by name
				axios.get('/api/animals/' + name)
				.then( (response) => {
					let exist_animal = this.animals.filter( animal => (animal.name == name) );
					if(exist_animal){
						this.animals.filter( animal => (animal.name == name) ) [0]['size'] = response.data[0]['size'];
					}
				})
				.catch(function(error){
					console.log(error);					
				});
			},

			rndStr(len) {
				let text = ""
				let chars = "abcdefghijklmnopqrstuvwxyz"

				for ( var i=0; i < len; i++ ) {
					text += chars.charAt(Math.floor(Math.random() * chars.length))
				}

				return text;
			}
		}
	}
</script>