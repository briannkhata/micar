! function(a) {
    "function" === typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a, b) {
    "use strict";
    a.infinitescroll = function(b, c, d) {
        this.element = a(d), this._create(b, c) || (this.failed = !0)
    }, a.infinitescroll.defaults = {
        loading: {
            finished: b,
            finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
            img: "https://pythonhosted.org/pgmagick/_images/transparent.png",
            msg: null,
            msgText: '<div class="loading clearfix"><div class="dot dot1"></div><div class="dot dot2"></div><div class="dot dot3"></div><div class="dot dot4"></div></div>',
            selector: null,
            speed: "fast",
            start: b
        },
        state: {
            isDuringAjax: !1,
            isInvalidPage: !1,
            isDestroyed: !1,
            isDone: !1,
            isPaused: 1,
            isBeyondMaxPage: !1,
            currPage: 1
        },
        debug: !1,
        behavior: b,
        binder: a(window),
        nextSelector: "div.navigation a:first",
        navSelector: "div.navigation",
        contentSelector: null,
        extraScrollPx: 150,
        itemSelector: "div.post",
        animate: !1,
        pathParse: b,
        dataType: "html",
        appendCallback: !0,
        bufferPx: 40,
        errorCallback: function() {},
        infid: 0,
        pixelsFromNavToBottom: b,
        path: b,
        prefill: !1,
        maxPage: b
    }, a.infinitescroll.prototype = {
        _binding: function(a) {
            var c = this,
                d = c.options;
            return d.v = "2.0b2.120520", d.behavior && this["_binding_" + d.behavior] !== b ? void this["_binding_" + d.behavior].call(this) : "bind" !== a && "unbind" !== a ? (this._debug("Binding value  " + a + " not valid"), !1) : ("unbind" === a ? this.options.binder.unbind("smartscroll.infscr." + c.options.infid) : this.options.binder[a]("smartscroll.infscr." + c.options.infid, function() {
                c.scroll()
            }), void this._debug("Binding", a))
        },
        _create: function(c, d) {
            var e = a.extend(!0, {}, a.infinitescroll.defaults, c);
            this.options = e;
            var f = a(window),
                g = this;
            if (!g._validate(c)) return !1;
            var h = a(e.nextSelector).attr("href");
            if (!h) return this._debug("Navigation selector not found"), !1;
            e.path = e.path || this._determinepath(h), e.contentSelector = e.contentSelector || this.element, e.loading.selector = e.loading.selector || e.contentSelector, e.loading.msg = e.loading.msg || a('<div id="infscr-loading"><img alt="Loading..." src="' + e.loading.img + '" /><div>' + e.loading.msgText + "</div></div>"), (new Image).src = e.loading.img, e.pixelsFromNavToBottom === b && (e.pixelsFromNavToBottom = a(document).height() - a(e.navSelector).offset().top, this._debug("pixelsFromNavToBottom: " + e.pixelsFromNavToBottom));
            var i = this;
            return e.loading.start = e.loading.start || function() {
                a(e.navSelector).hide(), e.loading.msg.appendTo(e.loading.selector).show(e.loading.speed, a.proxy(function() {
                    this.beginAjax(e)
                    this.pause
                }, i))
            }, e.loading.finished = e.loading.finished || function() {
                e.state.isBeyondMaxPage || e.loading.msg.fadeOut(e.loading.speed)
            }, e.callback = function(c, g, h) {
                e.behavior && c["_callback_" + e.behavior] !== b && c["_callback_" + e.behavior].call(a(e.contentSelector)[0], g, h), d && d.call(a(e.contentSelector)[0], g, e, h), e.prefill && f.bind("resize.infinite-scroll", c._prefill)
            }, c.debug && (!Function.prototype.bind || "object" !== typeof console && "function" !== typeof console || "object" !== typeof console.log || ["log", "info", "warn", "error", "assert", "dir", "clear", "profile", "profileEnd"].forEach(function(a) {
                console[a] = this.call(console[a], console)
            }, Function.prototype.bind)), this._setup(), e.prefill && this._prefill(), !0
        },
        _prefill: function() {
            function d() {
                return a(b.options.contentSelector).height() <= c.height()
            }
            var b = this,
                c = a(window);
            this._prefill = function() {
                d() && b.scroll(), c.bind("resize.infinite-scroll", function() {
                    d() && (c.unbind("resize.infinite-scroll"), b.scroll())
                })
            }, this._prefill()
        },
        _debug: function() {
            !0 === this.options.debug && ("undefined" !== typeof console && "function" === typeof console.log ? console.log(1 === Array.prototype.slice.call(arguments).length && "string" === typeof Array.prototype.slice.call(arguments)[0] ? Array.prototype.slice.call(arguments).toString() : Array.prototype.slice.call(arguments)) : Function.prototype.bind || "undefined" === typeof console || "object" !== typeof console.log || Function.prototype.call.call(console.log, console, Array.prototype.slice.call(arguments)))
        },
        _determinepath: function(a) {
            var c = this.options;
            if (c.behavior && this["_determinepath_" + c.behavior] !== b) return this["_determinepath_" + c.behavior].call(this, a);
            if (c.pathParse) return this._debug("pathParse manual"), c.pathParse(a, this.options.state.currPage + 1);
            if (a.match(/^(.*\/page:)2(\/.*|$)$/)) a = a.match(/^(.*\/page:)2(\/.*|$)$/).slice(1);
            else if (a.match(/^(.*?)\b2\b(.*?$)/)) a = a.match(/^(.*?)\b2\b(.*?$)/).slice(1);
            else if (a.match(/^(.*?)2(.*?$)/)) {
                if (a.match(/^(.*?page=)2(\/.*|$)/)) return a = a.match(/^(.*?page=)2(\/.*|$)/).slice(1);
                a = a.match(/^(.*?)2(.*?$)/).slice(1)
            } else {
                if (a.match(/^(.*?page=)1(\/.*|$)/)) return a = a.match(/^(.*?page=)1(\/.*|$)/).slice(1);
                this._debug("Sorry, we couldn't parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com."), c.state.isInvalidPage = !0
            }
            return this._debug("determinePath", a), a
        },
        _error: function(a) {
            var c = this.options;
            return c.behavior && this["_error_" + c.behavior] !== b ? void this["_error_" + c.behavior].call(this, a) : ("destroy" !== a && "end" !== a && (a = "unknown"), this._debug("Error", a), ("end" === a || c.state.isBeyondMaxPage) && this._showdonemsg(), c.state.isDone = !0, c.state.currPage = 1, c.state.isPaused = !1, c.state.isBeyondMaxPage = !1, void this._binding("unbind"))
        },
        _loadcallback: function(c, d, e) {
            var i, f = this.options,
                g = this.options.callback,
                h = f.state.isDone ? "done" : f.appendCallback ? "append" : "no-append";
            if (f.behavior && this["_loadcallback_" + f.behavior] !== b) return void this["_loadcallback_" + f.behavior].call(this, c, d, e);
            switch (h) {
                case "done":
                    return this._showdonemsg(), !1;
                case "no-append":
                    if ("html" === f.dataType && (d = "<div>" + d + "</div>", d = a(d).find(f.itemSelector)), 0 === d.length) return this._error("end");
                    break;
                case "append":
                    var j = c.children();
                    if (0 === j.length) return this._error("end");
                    for (i = document.createDocumentFragment(); c[0].firstChild;) i.appendChild(c[0].firstChild);
                    this._debug("contentSelector", a(f.contentSelector)[0]), a(f.contentSelector)[0].appendChild(i), d = j.get()
            }
            if (f.loading.finished.call(a(f.contentSelector)[0], f), f.animate) {
                var k = a(window).scrollTop() + a(f.loading.msg).height() + f.extraScrollPx + "px";
                a("html,body").animate({
                    scrollTop: k
                }, 800, function() {
                    f.state.isDuringAjax = !1
                })
            }
            f.animate || (f.state.isDuringAjax = !1), g(this, d, e), f.prefill && this._prefill()
        },
        _nearbottom: function() {
            var c = this.options,
                d = 0 + a(document).height() - c.binder.scrollTop() - a(window).height();
            return c.behavior && this["_nearbottom_" + c.behavior] !== b ? this["_nearbottom_" + c.behavior].call(this) : (this._debug("math:", d, c.pixelsFromNavToBottom), d - c.bufferPx < c.pixelsFromNavToBottom)
        },
        _pausing: function(a) {
            var c = this.options;
            if (c.behavior && this["_pausing_" + c.behavior] !== b) return void this["_pausing_" + c.behavior].call(this, a);
            switch ("pause" !== a && "resume" !== a && null !== a && this._debug("Invalid argument. Toggling pause value instead"), a = !a || "pause" !== a && "resume" !== a ? "toggle" : a) {
                case "pause":
                    c.state.isPaused = !0;
                    break;
                case "resume":
                    c.state.isPaused = !1;
                    break;
                case "toggle":
                    c.state.isPaused = !c.state.isPaused
            }
            return this._debug("Paused", c.state.isPaused), !1
        },
        _setup: function() {
            var a = this.options;
            return a.behavior && this["_setup_" + a.behavior] !== b ? void this["_setup_" + a.behavior].call(this) : (this._binding("bind"), !1)
        },
        _showdonemsg: function() {
            var c = this.options;
            return c.behavior && this["_showdonemsg_" + c.behavior] !== b ? void this["_showdonemsg_" + c.behavior].call(this) : (c.loading.msg.find("img").hide().parent().find("div").html(c.loading.finishedMsg).animate({
                opacity: 1
            }, 2e3, function() {
                a(this).parent().fadeOut(c.loading.speed)
            }), void c.errorCallback.call(a(c.contentSelector)[0], "done"))
        },
        _validate: function(b) {
            for (var c in b)
                if (c.indexOf && c.indexOf("Selector") > -1 && 0 === a(b[c]).length) return this._debug("Your " + c + " found no elements."), !1;
            return !0
        },
        bind: function() {
            this._binding("bind")
        },
        destroy: function() {
            return this.options.state.isDestroyed = !0, this.options.loading.finished(), this._error("destroy")
        },
        pause: function() {
            this._pausing("pause")
        },
        resume: function() {
            this._pausing("resume")
        },
        beginAjax: function(c) {
            var f, g, h, i, d = this,
                e = c.path;
            if (c.state.currPage++, c.maxPage !== b && c.state.currPage > c.maxPage) return c.state.isBeyondMaxPage = !0, void this.destroy();
            switch (f = a(a(c.contentSelector).is("table, tbody") ? "<tbody/>" : "<div/>"), g = "function" === typeof e ? e(c.state.currPage) : e.join(c.state.currPage), d._debug("heading into ajax", g), h = "html" === c.dataType || "json" === c.dataType ? c.dataType : "html+callback", c.appendCallback && "html" === c.dataType && (h += "+callback"), h) {
                case "html+callback":
                    d._debug("Using HTML via .load() method"), g = encodeURI(g), f.load(g + " " + c.itemSelector, b, function(a) {
                        d._loadcallback(f, a, g)
                    });
                    break;
                case "html":
                    d._debug("Using " + h.toUpperCase() + " via $.ajax() method"), a.ajax({
                        url: g,
                        dataType: c.dataType,
                        complete: function(a, b) {
                            i = "undefined" !== typeof a.isResolved ? a.isResolved() : "success" === b || "notmodified" === b, i ? d._loadcallback(f, a.responseText, g) : d._error("end")
                        }
                    });
                    break;
                case "json":
                    d._debug("Using " + h.toUpperCase() + " via $.ajax() method"), a.ajax({
                        dataType: "json",
                        type: "GET",
                        url: g,
                        success: function(a, e, h) {
                            if (i = "undefined" !== typeof h.isResolved ? h.isResolved() : "success" === e || "notmodified" === e, c.appendCallback)
                                if (c.template !== b) {
                                    var j = c.template(a);
                                    f.append(j), i ? d._loadcallback(f, j) : d._error("end")
                                } else d._debug("template must be defined."), d._error("end");
                            else i ? d._loadcallback(f, a, g) : d._error("end")
                        },
                        error: function() {
                            d._debug("JSON ajax request failed."), d._error("end")
                        }
                    })
            }
        },
        retrieve: function(c) {
            c = c || null;
            var d = this,
                e = d.options;
            return e.behavior && this["retrieve_" + e.behavior] !== b ? void this["retrieve_" + e.behavior].call(this, c) : e.state.isDestroyed ? (this._debug("Instance is destroyed"), !1) : (e.state.isDuringAjax = !0, void e.loading.start.call(a(e.contentSelector)[0], e))
        },
        scroll: function() {
            var a = this.options,
                c = a.state;
            return a.behavior && this["scroll_" + a.behavior] !== b ? void this["scroll_" + a.behavior].call(this) : void(c.isDuringAjax || c.isInvalidPage || c.isDone || c.isDestroyed || c.isPaused || this._nearbottom() && this.retrieve())
        },
        toggle: function() {
            this._pausing()
        },
        unbind: function() {
            this._binding("unbind")
        },
        update: function(b) {
            a.isPlainObject(b) && (this.options = a.extend(!0, this.options, b))
        }
    }, a.fn.infinitescroll = function(b, c) {
        var d = typeof b;
        switch (d) {
            case "string":
                var e = Array.prototype.slice.call(arguments, 1);
                this.each(function() {
                    var c = a.data(this, "infinitescroll");
                    return c && a.isFunction(c[b]) && "_" !== b.charAt(0) ? void c[b].apply(c, e) : !1
                });
                break;
            case "object":
                this.each(function() {
                    var d = a.data(this, "infinitescroll");
                    d ? d.update(b) : (d = new a.infinitescroll(b, c, this), d.failed || a.data(this, "infinitescroll", d))
                })
        }
        return this
    };
    var d, c = a.event;
    c.special.smartscroll = {
        setup: function() {
            a(this).bind("scroll", c.special.smartscroll.handler)
        },
        teardown: function() {
            a(this).unbind("scroll", c.special.smartscroll.handler)
        },
        handler: function(b, c) {
            var e = this,
                f = arguments;
            b.type = "smartscroll", d && clearTimeout(d), d = setTimeout(function() {
                a(e).trigger("smartscroll", f)
            }, "execAsap" === c ? 0 : 100)
        }
    }, a.fn.smartscroll = function(a) {
        return a ? this.bind("smartscroll", a) : this.trigger("smartscroll", ["execAsap"])
    }
});