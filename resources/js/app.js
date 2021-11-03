import Vue from 'vue'

//Main pages
import App from './views/app.vue'

const app = new Vue({
    el: '#app',
    components: { App },
    methods: {
        onChange(event) {
            // TODO: add checkboxes
            var pizzaPrice = 0;
            this.price = event.target.value;
            if (this.price == 'MacDac Pizza') {
                pizzaPrice = 8.7;
            } else  {
                pizzaPrice = 6.45;
            }
            document.getElementById('price').textContent = pizzaPrice;
        }
    }

});
