<template>
    <div>
        <h3>Фильтр обсуждений</h3>
        <form id="discussion-filter" method="GET" action="/discussions/filter">
            <div class="input-group mb-3">
                <input hidden type="text" name="country" v-model="country.id">
                <multiselect
                    v-model="country"
                    :options="countries"
                    track-by="id"
                    label="name"
                    :disabled="countryDisabled"
                    @select="getRegions"
                >
                </multiselect>
            </div>
            <div class="input-group mb-3">
              <input hidden type="text" name="region" v-model="region.id">
              <multiselect
                  v-model="region"
                  :options="regions"
                  track-by="id"
                  label="name"
                  :disabled="regionDisabled"
                  @select = "getCities"
              >
              </multiselect>
            </div>
            <div class="input-group  mb-3">
                <input hidden type="text" name="city" v-model="city.id">
                <multiselect
                    v-model="city"
                    :options="cities"
                    track-by="id"
                    label="name"
                    :disabled="cityDisabled"
                    @select="getMicroregions"
                >
                </multiselect>
            </div>
            <div class="input-group  mb-3">
                <input hidden type="text" name="microregion" v-model="microregion.id">
                <multiselect
                    v-model="microregion"
                    :options="microregions"
                    track-by="id"
                    label="name"
                    :disabled="microregionDisabled"
                >
                </multiselect>
            </div>
            <div class="input-group ">
                <button v-on:click="submit" type="submit" class="btn btn-primary">Фильтровать</button>
            </div>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import axios from "axios";
import _ from "lodash";

export default {
    name: 'DiscussionFilter',
    components: {Multiselect},
    data(){
        return {
            country: {},
            region: {},
            city: {},
            microregion:{},
            street: {},
            apartment: {},

            countryDisabled:true,
            regionDisabled: true,
            cityDisabled: true,
            microregionDisabled:true,

            publishDateStart: null,
            publishDateEnd: null,

            countries:[{id:0,name:'Выберите страну'}],
            regions:[{id:0,name:'Выберите область'}],
            cities:[],
            microregions:[],
        };
    },
    watch:{
        country(newValue){
            if(_.isEmpty(newValue)){
                this.regionDisabled = true
            }
            this.regionDisabled = false;
        },
        region(newValue){
            if(_.isEmpty(newValue)){
                this.cityDisabled = true
            }
            this.cityDisabled = false;
        },
        city(newValue){
            if(_.isEmpty(newValue)){
                this.microregionDisabled = true
            }
            this.microregionDisabled = false;
        },
    },
    methods:{
        submit(e){
            e.preventDefault();
            let data = {};
            if(_.isEmpty(this.country) === false){
                data.country = this.country.id;
            }
            if(_.isEmpty(this.region) === false){
                data.region = this.region.id;
            }
            if(_.isEmpty(this.city) === false){
                data.city = this.city.id;
            }
            if(_.isEmpty(this.microregion) === false){
                data.microregion = this.microregion.id;
            }
            axios.get('/discussions/filter',{params:data})
                .then((response) => {
                    $('#discussions-wrapper').html(response.data);
                }).catch((error) => console.log(error));
        },
        getRegions(option,id){
            axios.get('/api/region/'+option.id).then((response) => {
                this.regions = response.data
            });
        },
        getCities(option,id){
            axios.get('/api/city/'+option.id).then((response) => {
                this.cities = response.data
            });
        },
        getMicroregions(option,id){
            axios.get('/api/microregion/'+option.id).then((response) => {
                this.regions = response.data
            });
        }
    },
    created() {
      axios.get('/api/country').then((response) => {
            _.merge(this.countries,response.data);
            this.countryDisabled = false;
      });
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>

</style>
