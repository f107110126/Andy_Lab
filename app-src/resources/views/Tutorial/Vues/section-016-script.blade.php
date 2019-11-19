<script>
    Vue.directive('ajax', {
        params: ['complete'],
        bind: function () {
            this.el.addEventListener('submit', this.onSubmit.bind(this));
        },
        onSubmit: function (e) {
            let requestType = this.getRequestType();
            e.preventDefault();
            // console.log(requestType);
            this.vm.$http[requestType](this.el.action)
                .then(this.onComplete.bind(this))
                .catch(this.onError.bind(this));

        },
        getRequestType: function () {
            let method = this.el.querySelector('input[name="_method"]');
            // this.el.method = 'post'
            // method = <input name="_method" value="delete">
            // console.log((method ? method.value : this.el.method).toLowerCase());
            return (method ? method.value : this.el.method).toLowerCase();
        },
        onComplete: function () {
            if (this.params.complete) alert(this.params.complete);
        },
        onError: function (response) {
            alert(response.data.message);
        }
    });
    new Vue({
        el: '#app',
        http: {
            headers: {
                // You could also store your token in a global object,
                // and reference it here. APP.token
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        }
    });
</script>
