<template>
    <div >
			<div class="row justify-content-md-center">
          
            <div class="form-group col-md-3 col-sm-6">
                <label for="start_date">Ultimo franco:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" v-model="ultimo">
            </div>
						<div class="form-group col-md-3 col-sm-6">
							<label for="cantidad">Dias a calcular</label>
							<input type="number" name="cantidad" id="cantidad" v-model = "cantidad" class="form-control">
						</div>
						<div class="form-group col-md-3 col-sm-12">
							<label for="">Calcular</label>
							<input type="button" value="Calcular" class="btn btn-primary btn-block" @click="calcular()">
						</div>
					
					<div class="col-md-8" mt=6>
						<hr>
						<full-calendar :config="config" :events="events" ref="calendar"/>
					</div>
      </div>
        
    </div>
</template>

<script>
		import moment from 'moment'
		import 'fullcalendar/dist/locale/es'
	export default {
  name: 'hello',
  data () {
    return {
			ultimo : null,
			cantidad : 60,
			events: [
	
			],
			config: {
				defaultView: 'month',
				locale: 'es',
				eventRender: function(event, element) {
    		}
      },
    }
	},

	methods: {
		refreshEvents() {
			  this.$refs.calendar.$emit('removeEvents');
			  this.events = [];
    	},
		calcular() {
			if(this.events.length > 0) {
				this.refreshEvents();
			}

			let dia_1 = 5;
			let dia_2 = 6;

			do {
				this.events.push(
						{
							title: 'franco',
							allDay: true,
							start: moment(this.ultimo).add(dia_1,'d'),
						},
						{
							title: 'franco',
							allDay: true,
							start: moment(this.ultimo).add(dia_2,'d'),
						}
					);
					dia_1+=6;
					dia_2+=6;
			}
			while(dia_2 <= this.cantidad);
		}
	},
	mounted() {
		this.ultimo = moment().format('YYYY-MM-DD');
	}
}
</script>
