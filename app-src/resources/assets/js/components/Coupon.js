module.exports = {
    template: require('./coupon.template.html'),

    props: ['when-applied'],

    data: function () {
        return {
            coupon: {
                code: '',
                description: '',
                discount: 0
            },

            valid: false
        };
    },

    methods: {
        validate: function () {
            this.$http.get('/Andy_Lab/tutorial/vue-1.0/api/coupons/' + this.coupon.code)
                .then(response => {
                    let coupon = response.body;
                    this.coupon = coupon;
                    this.valid = true;
                    this.whenApplied(coupon.discount)
                }, response => {
                    this.coupon.code = '';
                    this.coupon.description = 'Sorry, that coupon does not exist.';
                });
            // this.$http.get('/api/coupons/' + this.coupon.code)
            //     .success(function(coupon) {
            //         this.coupon = coupon;
            //         this.valid = true;
            //
            //         this.whenApplied(coupon.discount);
            //     })
            //     .error(function() {
            //         this.coupon.code = '';
            //         this.coupon.description = 'Sorry, that coupon does not exist.';
            //     });
        }
    }
};
