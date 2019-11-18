module.exports = {
    template: require('./checkout.template.html'),

    data: function () {
        return {
            cost: 50,
            discount: 0
        };
    },

    components: {
        coupon: require('../components/Coupon')
    },

    filters: {
        // since the filter doesn't wrapped in component any more, so
        // this filter can't use too.
        // coupon: function (cost) {
        //     return cost - (this.discount / 100 * cost);
        // },
        // this is copied from internet
        coupon: function (cost, discount) {
            return cost - (discount / 100 * cost);
        },
        currency: function (value) {
            return '$' + value
        }
    },
    methods: {
        applyDiscount: function (discount) {
            this.discount = discount;
        }
    }
};
