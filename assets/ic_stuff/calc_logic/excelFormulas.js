/* Based on 
 * - EGM Mathematical Finance class by Enrique Garcia M. <egarcia@egm.co>
 * - A Guide to the PMT, FV, IPMT and PPMT Functions by Kevin (aka MWVisa1)
 */

var ExcelFormulas = {

    PVIF: function (rate, nper) {
        return Math.pow(1 + rate, nper);
    },

    FVIFA: function (rate, nper) {
        return rate == 0 ? nper : (this.PVIF(rate, nper) - 1) / rate;
    },

    PMT: function (rate, nper, pv, fv, type) {
        if (!fv) fv = 0;
        if (!type) type = 0;

        if (rate == 0) return -(pv + fv) / nper;

        var pvif = Math.pow(1 + rate, nper);
        var pmt = rate / (pvif - 1) * -(pv * pvif + fv);

        if (type == 1) {
            pmt /= (1 + rate);
        };

        return pmt;
    },

    IPMT: function (pv, pmt, rate, per) {
        var tmp = Math.pow(1 + rate, per);
        return 0 - (pv * tmp * rate + pmt * (tmp - 1));
    },

    PPMT: function (rate, per, nper, pv, fv, type) {
        if (per < 1 || (per >= nper + 1)) return null;
        var pmt = this.PMT(rate, nper, pv, fv, type);
        var ipmt = this.IPMT(pv, pmt, rate, per - 1);
        return pmt - ipmt;
    },

    DaysBetween: function (date1, date2) {
        var oneDay = 24 * 60 * 60 * 1000;
        return Math.round(Math.abs((date1.getTime() - date2.getTime()) / oneDay));
    },

    // Change Period and Flow to period and value fields you use
    XNPV: function (rate, values) {
        var xnpv = 0.0;
        var firstDate = 0;
        for (var key in values) {
            var tmp = values[key];
            var value = tmp.Flow;
            var period = tmp.Period;
            xnpv += value / Math.pow(1 + rate, period);
        };
        return xnpv;
    },

    XIRR: function (values, guess) {
        if (!guess) guess = 0.1;

        var x1 = 0.0;
        var x2 = guess;
        var f1 = this.XNPV(x1, values);
        var f2 = this.XNPV(x2, values);

        for (var i = 0; i < 100; i++) {
            if ((f1 * f2) < 0.0) break;
            if (Math.abs(f1) < Math.abs(f2)) {
                f1 = this.XNPV(x1 += 1.6 * (x1 - x2), values);
            }
            else {
                f2 = this.XNPV(x2 += 1.6 * (x2 - x1), values);
            }
        };

        if ((f1 * f2) > 0.0) return null;

        var f = this.XNPV(x1, values);
        if (f < 0.0) {
            var rtb = x1;
            var dx = x2 - x1;
        }
        else {
            var rtb = x2;
            var dx = x1 - x2;
        };

        for (var i = 0; i < 100; i++) {
            dx *= 0.5;
            var x_mid = rtb + dx;
            var f_mid = this.XNPV(x_mid, values);
            if (f_mid <= 0.0) rtb = x_mid;
            if ((Math.abs(f_mid) < 1.0e-6) || (Math.abs(dx) < 1.0e-6)) return x_mid; //(x_mid * 0.961221427);

        };

        return null;
    }

};