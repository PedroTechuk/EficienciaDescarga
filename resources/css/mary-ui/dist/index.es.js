import Q from "react";
var Z = { exports: {} }, I = {};
/**
 * @license React
 * react-jsx-runtime.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var we;
function lr() {
  if (we)
    return I;
  we = 1;
  var g = Q, p = Symbol.for("react.element"), _ = Symbol.for("react.fragment"), b = Object.prototype.hasOwnProperty, T = g.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner, S = { key: !0, ref: !0, __self: !0, __source: !0 };
  function F(x, f, k) {
    var h, y = {}, j = null, W = null;
    k !== void 0 && (j = "" + k), f.key !== void 0 && (j = "" + f.key), f.ref !== void 0 && (W = f.ref);
    for (h in f)
      b.call(f, h) && !S.hasOwnProperty(h) && (y[h] = f[h]);
    if (x && x.defaultProps)
      for (h in f = x.defaultProps, f)
        y[h] === void 0 && (y[h] = f[h]);
    return { $$typeof: p, type: x, key: j, ref: W, props: y, _owner: T.current };
  }
  return I.Fragment = _, I.jsx = F, I.jsxs = F, I;
}
var V = {};
/**
 * @license React
 * react-jsx-runtime.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Te;
function ur() {
  return Te || (Te = 1, process.env.NODE_ENV !== "production" && function() {
    var g = Q, p = Symbol.for("react.element"), _ = Symbol.for("react.portal"), b = Symbol.for("react.fragment"), T = Symbol.for("react.strict_mode"), S = Symbol.for("react.profiler"), F = Symbol.for("react.provider"), x = Symbol.for("react.context"), f = Symbol.for("react.forward_ref"), k = Symbol.for("react.suspense"), h = Symbol.for("react.suspense_list"), y = Symbol.for("react.memo"), j = Symbol.for("react.lazy"), W = Symbol.for("react.offscreen"), ee = Symbol.iterator, Se = "@@iterator";
    function ke(e) {
      if (e === null || typeof e != "object")
        return null;
      var r = ee && e[ee] || e[Se];
      return typeof r == "function" ? r : null;
    }
    var C = g.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;
    function d(e) {
      {
        for (var r = arguments.length, t = new Array(r > 1 ? r - 1 : 0), n = 1; n < r; n++)
          t[n - 1] = arguments[n];
        Ce("error", e, t);
      }
    }
    function Ce(e, r, t) {
      {
        var n = C.ReactDebugCurrentFrame, s = n.getStackAddendum();
        s !== "" && (r += "%s", t = t.concat([s]));
        var l = t.map(function(i) {
          return String(i);
        });
        l.unshift("Warning: " + r), Function.prototype.apply.call(console[e], console, l);
      }
    }
    var Oe = !1, Pe = !1, Fe = !1, Ae = !1, De = !1, re;
    re = Symbol.for("react.module.reference");
    function Ie(e) {
      return !!(typeof e == "string" || typeof e == "function" || e === b || e === S || De || e === T || e === k || e === h || Ae || e === W || Oe || Pe || Fe || typeof e == "object" && e !== null && (e.$$typeof === j || e.$$typeof === y || e.$$typeof === F || e.$$typeof === x || e.$$typeof === f || // This needs to include all possible module reference object
      // types supported by any Flight configuration anywhere since
      // we don't know which Flight build this will end up being used
      // with.
      e.$$typeof === re || e.getModuleId !== void 0));
    }
    function Ve(e, r, t) {
      var n = e.displayName;
      if (n)
        return n;
      var s = r.displayName || r.name || "";
      return s !== "" ? t + "(" + s + ")" : t;
    }
    function te(e) {
      return e.displayName || "Context";
    }
    function E(e) {
      if (e == null)
        return null;
      if (typeof e.tag == "number" && d("Received an unexpected object in getComponentNameFromType(). This is likely a bug in React. Please file an issue."), typeof e == "function")
        return e.displayName || e.name || null;
      if (typeof e == "string")
        return e;
      switch (e) {
        case b:
          return "Fragment";
        case _:
          return "Portal";
        case S:
          return "Profiler";
        case T:
          return "StrictMode";
        case k:
          return "Suspense";
        case h:
          return "SuspenseList";
      }
      if (typeof e == "object")
        switch (e.$$typeof) {
          case x:
            var r = e;
            return te(r) + ".Consumer";
          case F:
            var t = e;
            return te(t._context) + ".Provider";
          case f:
            return Ve(e, e.render, "ForwardRef");
          case y:
            var n = e.displayName || null;
            return n !== null ? n : E(e.type) || "Memo";
          case j: {
            var s = e, l = s._payload, i = s._init;
            try {
              return E(i(l));
            } catch {
              return null;
            }
          }
        }
      return null;
    }
    var w = Object.assign, A = 0, ne, ae, oe, ie, se, le, ue;
    function ce() {
    }
    ce.__reactDisabledLog = !0;
    function We() {
      {
        if (A === 0) {
          ne = console.log, ae = console.info, oe = console.warn, ie = console.error, se = console.group, le = console.groupCollapsed, ue = console.groupEnd;
          var e = {
            configurable: !0,
            enumerable: !0,
            value: ce,
            writable: !0
          };
          Object.defineProperties(console, {
            info: e,
            log: e,
            warn: e,
            error: e,
            group: e,
            groupCollapsed: e,
            groupEnd: e
          });
        }
        A++;
      }
    }
    function $e() {
      {
        if (A--, A === 0) {
          var e = {
            configurable: !0,
            enumerable: !0,
            writable: !0
          };
          Object.defineProperties(console, {
            log: w({}, e, {
              value: ne
            }),
            info: w({}, e, {
              value: ae
            }),
            warn: w({}, e, {
              value: oe
            }),
            error: w({}, e, {
              value: ie
            }),
            group: w({}, e, {
              value: se
            }),
            groupCollapsed: w({}, e, {
              value: le
            }),
            groupEnd: w({}, e, {
              value: ue
            })
          });
        }
        A < 0 && d("disabledDepth fell below zero. This is a bug in React. Please file an issue.");
      }
    }
    var U = C.ReactCurrentDispatcher, z;
    function $(e, r, t) {
      {
        if (z === void 0)
          try {
            throw Error();
          } catch (s) {
            var n = s.stack.trim().match(/\n( *(at )?)/);
            z = n && n[1] || "";
          }
        return `
` + z + e;
      }
    }
    var B = !1, N;
    {
      var Ne = typeof WeakMap == "function" ? WeakMap : Map;
      N = new Ne();
    }
    function fe(e, r) {
      if (!e || B)
        return "";
      {
        var t = N.get(e);
        if (t !== void 0)
          return t;
      }
      var n;
      B = !0;
      var s = Error.prepareStackTrace;
      Error.prepareStackTrace = void 0;
      var l;
      l = U.current, U.current = null, We();
      try {
        if (r) {
          var i = function() {
            throw Error();
          };
          if (Object.defineProperty(i.prototype, "props", {
            set: function() {
              throw Error();
            }
          }), typeof Reflect == "object" && Reflect.construct) {
            try {
              Reflect.construct(i, []);
            } catch (R) {
              n = R;
            }
            Reflect.construct(e, [], i);
          } else {
            try {
              i.call();
            } catch (R) {
              n = R;
            }
            e.call(i.prototype);
          }
        } else {
          try {
            throw Error();
          } catch (R) {
            n = R;
          }
          e();
        }
      } catch (R) {
        if (R && n && typeof R.stack == "string") {
          for (var o = R.stack.split(`
`), v = n.stack.split(`
`), u = o.length - 1, c = v.length - 1; u >= 1 && c >= 0 && o[u] !== v[c]; )
            c--;
          for (; u >= 1 && c >= 0; u--, c--)
            if (o[u] !== v[c]) {
              if (u !== 1 || c !== 1)
                do
                  if (u--, c--, c < 0 || o[u] !== v[c]) {
                    var m = `
` + o[u].replace(" at new ", " at ");
                    return e.displayName && m.includes("<anonymous>") && (m = m.replace("<anonymous>", e.displayName)), typeof e == "function" && N.set(e, m), m;
                  }
                while (u >= 1 && c >= 0);
              break;
            }
        }
      } finally {
        B = !1, U.current = l, $e(), Error.prepareStackTrace = s;
      }
      var P = e ? e.displayName || e.name : "", je = P ? $(P) : "";
      return typeof e == "function" && N.set(e, je), je;
    }
    function Ye(e, r, t) {
      return fe(e, !1);
    }
    function Le(e) {
      var r = e.prototype;
      return !!(r && r.isReactComponent);
    }
    function Y(e, r, t) {
      if (e == null)
        return "";
      if (typeof e == "function")
        return fe(e, Le(e));
      if (typeof e == "string")
        return $(e);
      switch (e) {
        case k:
          return $("Suspense");
        case h:
          return $("SuspenseList");
      }
      if (typeof e == "object")
        switch (e.$$typeof) {
          case f:
            return Ye(e.render);
          case y:
            return Y(e.type, r, t);
          case j: {
            var n = e, s = n._payload, l = n._init;
            try {
              return Y(l(s), r, t);
            } catch {
            }
          }
        }
      return "";
    }
    var L = Object.prototype.hasOwnProperty, de = {}, ve = C.ReactDebugCurrentFrame;
    function M(e) {
      if (e) {
        var r = e._owner, t = Y(e.type, e._source, r ? r.type : null);
        ve.setExtraStackFrame(t);
      } else
        ve.setExtraStackFrame(null);
    }
    function Me(e, r, t, n, s) {
      {
        var l = Function.call.bind(L);
        for (var i in e)
          if (l(e, i)) {
            var o = void 0;
            try {
              if (typeof e[i] != "function") {
                var v = Error((n || "React class") + ": " + t + " type `" + i + "` is invalid; it must be a function, usually from the `prop-types` package, but received `" + typeof e[i] + "`.This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.");
                throw v.name = "Invariant Violation", v;
              }
              o = e[i](r, i, n, t, null, "SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED");
            } catch (u) {
              o = u;
            }
            o && !(o instanceof Error) && (M(s), d("%s: type specification of %s `%s` is invalid; the type checker function must return `null` or an `Error` but returned a %s. You may have forgotten to pass an argument to the type checker creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and shape all require an argument).", n || "React class", t, i, typeof o), M(null)), o instanceof Error && !(o.message in de) && (de[o.message] = !0, M(s), d("Failed %s type: %s", t, o.message), M(null));
          }
      }
    }
    var Ue = Array.isArray;
    function H(e) {
      return Ue(e);
    }
    function ze(e) {
      {
        var r = typeof Symbol == "function" && Symbol.toStringTag, t = r && e[Symbol.toStringTag] || e.constructor.name || "Object";
        return t;
      }
    }
    function Be(e) {
      try {
        return pe(e), !1;
      } catch {
        return !0;
      }
    }
    function pe(e) {
      return "" + e;
    }
    function he(e) {
      if (Be(e))
        return d("The provided key is an unsupported type %s. This value must be coerced to a string before before using it here.", ze(e)), pe(e);
    }
    var D = C.ReactCurrentOwner, He = {
      key: !0,
      ref: !0,
      __self: !0,
      __source: !0
    }, me, ge, J;
    J = {};
    function Je(e) {
      if (L.call(e, "ref")) {
        var r = Object.getOwnPropertyDescriptor(e, "ref").get;
        if (r && r.isReactWarning)
          return !1;
      }
      return e.ref !== void 0;
    }
    function qe(e) {
      if (L.call(e, "key")) {
        var r = Object.getOwnPropertyDescriptor(e, "key").get;
        if (r && r.isReactWarning)
          return !1;
      }
      return e.key !== void 0;
    }
    function Ge(e, r) {
      if (typeof e.ref == "string" && D.current && r && D.current.stateNode !== r) {
        var t = E(D.current.type);
        J[t] || (d('Component "%s" contains the string ref "%s". Support for string refs will be removed in a future major release. This case cannot be automatically converted to an arrow function. We ask you to manually fix this case by using useRef() or createRef() instead. Learn more about using refs safely here: https://reactjs.org/link/strict-mode-string-ref', E(D.current.type), e.ref), J[t] = !0);
      }
    }
    function Ke(e, r) {
      {
        var t = function() {
          me || (me = !0, d("%s: `key` is not a prop. Trying to access it will result in `undefined` being returned. If you need to access the same value within the child component, you should pass it as a different prop. (https://reactjs.org/link/special-props)", r));
        };
        t.isReactWarning = !0, Object.defineProperty(e, "key", {
          get: t,
          configurable: !0
        });
      }
    }
    function Xe(e, r) {
      {
        var t = function() {
          ge || (ge = !0, d("%s: `ref` is not a prop. Trying to access it will result in `undefined` being returned. If you need to access the same value within the child component, you should pass it as a different prop. (https://reactjs.org/link/special-props)", r));
        };
        t.isReactWarning = !0, Object.defineProperty(e, "ref", {
          get: t,
          configurable: !0
        });
      }
    }
    var Ze = function(e, r, t, n, s, l, i) {
      var o = {
        // This tag allows us to uniquely identify this as a React Element
        $$typeof: p,
        // Built-in properties that belong on the element
        type: e,
        key: r,
        ref: t,
        props: i,
        // Record the component responsible for creating this element.
        _owner: l
      };
      return o._store = {}, Object.defineProperty(o._store, "validated", {
        configurable: !1,
        enumerable: !1,
        writable: !0,
        value: !1
      }), Object.defineProperty(o, "_self", {
        configurable: !1,
        enumerable: !1,
        writable: !1,
        value: n
      }), Object.defineProperty(o, "_source", {
        configurable: !1,
        enumerable: !1,
        writable: !1,
        value: s
      }), Object.freeze && (Object.freeze(o.props), Object.freeze(o)), o;
    };
    function Qe(e, r, t, n, s) {
      {
        var l, i = {}, o = null, v = null;
        t !== void 0 && (he(t), o = "" + t), qe(r) && (he(r.key), o = "" + r.key), Je(r) && (v = r.ref, Ge(r, s));
        for (l in r)
          L.call(r, l) && !He.hasOwnProperty(l) && (i[l] = r[l]);
        if (e && e.defaultProps) {
          var u = e.defaultProps;
          for (l in u)
            i[l] === void 0 && (i[l] = u[l]);
        }
        if (o || v) {
          var c = typeof e == "function" ? e.displayName || e.name || "Unknown" : e;
          o && Ke(i, c), v && Xe(i, c);
        }
        return Ze(e, o, v, s, n, D.current, i);
      }
    }
    var q = C.ReactCurrentOwner, be = C.ReactDebugCurrentFrame;
    function O(e) {
      if (e) {
        var r = e._owner, t = Y(e.type, e._source, r ? r.type : null);
        be.setExtraStackFrame(t);
      } else
        be.setExtraStackFrame(null);
    }
    var G;
    G = !1;
    function K(e) {
      return typeof e == "object" && e !== null && e.$$typeof === p;
    }
    function ye() {
      {
        if (q.current) {
          var e = E(q.current.type);
          if (e)
            return `

Check the render method of \`` + e + "`.";
        }
        return "";
      }
    }
    function er(e) {
      {
        if (e !== void 0) {
          var r = e.fileName.replace(/^.*[\\\/]/, ""), t = e.lineNumber;
          return `

Check your code at ` + r + ":" + t + ".";
        }
        return "";
      }
    }
    var Ee = {};
    function rr(e) {
      {
        var r = ye();
        if (!r) {
          var t = typeof e == "string" ? e : e.displayName || e.name;
          t && (r = `

Check the top-level render call using <` + t + ">.");
        }
        return r;
      }
    }
    function Re(e, r) {
      {
        if (!e._store || e._store.validated || e.key != null)
          return;
        e._store.validated = !0;
        var t = rr(r);
        if (Ee[t])
          return;
        Ee[t] = !0;
        var n = "";
        e && e._owner && e._owner !== q.current && (n = " It was passed a child from " + E(e._owner.type) + "."), O(e), d('Each child in a list should have a unique "key" prop.%s%s See https://reactjs.org/link/warning-keys for more information.', t, n), O(null);
      }
    }
    function _e(e, r) {
      {
        if (typeof e != "object")
          return;
        if (H(e))
          for (var t = 0; t < e.length; t++) {
            var n = e[t];
            K(n) && Re(n, r);
          }
        else if (K(e))
          e._store && (e._store.validated = !0);
        else if (e) {
          var s = ke(e);
          if (typeof s == "function" && s !== e.entries)
            for (var l = s.call(e), i; !(i = l.next()).done; )
              K(i.value) && Re(i.value, r);
        }
      }
    }
    function tr(e) {
      {
        var r = e.type;
        if (r == null || typeof r == "string")
          return;
        var t;
        if (typeof r == "function")
          t = r.propTypes;
        else if (typeof r == "object" && (r.$$typeof === f || // Note: Memo only checks outer props here.
        // Inner props are checked in the reconciler.
        r.$$typeof === y))
          t = r.propTypes;
        else
          return;
        if (t) {
          var n = E(r);
          Me(t, e.props, "prop", n, e);
        } else if (r.PropTypes !== void 0 && !G) {
          G = !0;
          var s = E(r);
          d("Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?", s || "Unknown");
        }
        typeof r.getDefaultProps == "function" && !r.getDefaultProps.isReactClassApproved && d("getDefaultProps is only used on classic React.createClass definitions. Use a static property named `defaultProps` instead.");
      }
    }
    function nr(e) {
      {
        for (var r = Object.keys(e.props), t = 0; t < r.length; t++) {
          var n = r[t];
          if (n !== "children" && n !== "key") {
            O(e), d("Invalid prop `%s` supplied to `React.Fragment`. React.Fragment can only have `key` and `children` props.", n), O(null);
            break;
          }
        }
        e.ref !== null && (O(e), d("Invalid attribute `ref` supplied to `React.Fragment`."), O(null));
      }
    }
    function xe(e, r, t, n, s, l) {
      {
        var i = Ie(e);
        if (!i) {
          var o = "";
          (e === void 0 || typeof e == "object" && e !== null && Object.keys(e).length === 0) && (o += " You likely forgot to export your component from the file it's defined in, or you might have mixed up default and named imports.");
          var v = er(s);
          v ? o += v : o += ye();
          var u;
          e === null ? u = "null" : H(e) ? u = "array" : e !== void 0 && e.$$typeof === p ? (u = "<" + (E(e.type) || "Unknown") + " />", o = " Did you accidentally export a JSX literal instead of a component?") : u = typeof e, d("React.jsx: type is invalid -- expected a string (for built-in components) or a class/function (for composite components) but got: %s.%s", u, o);
        }
        var c = Qe(e, r, t, s, l);
        if (c == null)
          return c;
        if (i) {
          var m = r.children;
          if (m !== void 0)
            if (n)
              if (H(m)) {
                for (var P = 0; P < m.length; P++)
                  _e(m[P], e);
                Object.freeze && Object.freeze(m);
              } else
                d("React.jsx: Static children should always be an array. You are likely explicitly calling React.jsxs or React.jsxDEV. Use the Babel transform instead.");
            else
              _e(m, e);
        }
        return e === b ? nr(c) : tr(c), c;
      }
    }
    function ar(e, r, t) {
      return xe(e, r, t, !0);
    }
    function or(e, r, t) {
      return xe(e, r, t, !1);
    }
    var ir = or, sr = ar;
    V.Fragment = b, V.jsx = ir, V.jsxs = sr;
  }()), V;
}
process.env.NODE_ENV === "production" ? Z.exports = lr() : Z.exports = ur();
var a = Z.exports;
const X = ({
  primary: g = !1,
  size: p = "medium",
  backgroundColor: _,
  label: b,
  ...T
}) => {
  const S = g ? "storybook-button--primary" : "storybook-button--secondary";
  return /* @__PURE__ */ a.jsx(
    "button",
    {
      type: "button",
      className: ["storybook-button", `storybook-button--${p}`, S].join(
        " "
      ),
      style: { backgroundColor: _ },
      ...T,
      children: b
    }
  );
};
const cr = ({ user: g, onLogin: p, onLogout: _, onCreateAccount: b }) => /* @__PURE__ */ a.jsx("header", { children: /* @__PURE__ */ a.jsxs("div", { className: "storybook-header", children: [
  /* @__PURE__ */ a.jsxs("div", { children: [
    /* @__PURE__ */ a.jsx(
      "svg",
      {
        width: "32",
        height: "32",
        viewBox: "0 0 32 32",
        xmlns: "http://www.w3.org/2000/svg",
        children: /* @__PURE__ */ a.jsxs("g", { fill: "none", fillRule: "evenodd", children: [
          /* @__PURE__ */ a.jsx(
            "path",
            {
              d: "M10 0h12a10 10 0 0110 10v12a10 10 0 01-10 10H10A10 10 0 010 22V10A10 10 0 0110 0z",
              fill: "#FFF"
            }
          ),
          /* @__PURE__ */ a.jsx(
            "path",
            {
              d: "M5.3 10.6l10.4 6v11.1l-10.4-6v-11zm11.4-6.2l9.7 5.5-9.7 5.6V4.4z",
              fill: "#555AB9"
            }
          ),
          /* @__PURE__ */ a.jsx(
            "path",
            {
              d: "M27.2 10.6v11.2l-10.5 6V16.5l10.5-6zM15.7 4.4v11L6 10l9.7-5.5z",
              fill: "#91BAF8"
            }
          )
        ] })
      }
    ),
    /* @__PURE__ */ a.jsx("h1", { children: "Acme" })
  ] }),
  /* @__PURE__ */ a.jsx("div", { children: g ? /* @__PURE__ */ a.jsxs(a.Fragment, { children: [
    /* @__PURE__ */ a.jsxs("span", { className: "welcome", children: [
      "Welcome, ",
      /* @__PURE__ */ a.jsx("b", { children: g.name }),
      "!"
    ] }),
    /* @__PURE__ */ a.jsx(X, { size: "small", onClick: _, label: "Log out" })
  ] }) : /* @__PURE__ */ a.jsxs(a.Fragment, { children: [
    /* @__PURE__ */ a.jsx(X, { size: "small", onClick: p, label: "Log in" }),
    /* @__PURE__ */ a.jsx(
      X,
      {
        primary: !0,
        size: "small",
        onClick: b,
        label: "Sign up"
      }
    )
  ] }) })
] }) });
const dr = () => {
  const [g, p] = Q.useState();
  return /* @__PURE__ */ a.jsxs("article", { children: [
    /* @__PURE__ */ a.jsx(
      cr,
      {
        user: g,
        onLogin: () => p({ name: "Jane Doe" }),
        onLogout: () => p(void 0),
        onCreateAccount: () => p({ name: "Jane Doe" })
      }
    ),
    /* @__PURE__ */ a.jsxs("section", { className: "storybook-page", children: [
      /* @__PURE__ */ a.jsx("h2", { children: "Pages in Storybook" }),
      /* @__PURE__ */ a.jsxs("p", { children: [
        "We recommend building UIs with a",
        " ",
        /* @__PURE__ */ a.jsx(
          "a",
          {
            href: "https://componentdriven.org",
            target: "_blank",
            rel: "noopener noreferrer",
            children: /* @__PURE__ */ a.jsx("strong", { children: "component-driven" })
          }
        ),
        " ",
        "process starting with atomic components and ending with pages."
      ] }),
      /* @__PURE__ */ a.jsx("p", { children: "Render pages with mock data. This makes it easy to build and review page states without needing to navigate to them in your app. Here are some handy patterns for managing page data in Storybook:" }),
      /* @__PURE__ */ a.jsxs("ul", { children: [
        /* @__PURE__ */ a.jsx("li", { children: 'Use a higher-level connected component. Storybook helps you compose such data from the "args" of child component stories' }),
        /* @__PURE__ */ a.jsx("li", { children: "Assemble data in the page component from your services. You can mock these services out using Storybook." })
      ] }),
      /* @__PURE__ */ a.jsxs("p", { children: [
        "Get a guided tutorial on component-driven development at",
        " ",
        /* @__PURE__ */ a.jsx(
          "a",
          {
            href: "https://storybook.js.org/tutorials/",
            target: "_blank",
            rel: "noopener noreferrer",
            children: "Storybook tutorials"
          }
        ),
        ". Read more in the",
        " ",
        /* @__PURE__ */ a.jsx(
          "a",
          {
            href: "https://storybook.js.org/docs",
            target: "_blank",
            rel: "noopener noreferrer",
            children: "docs"
          }
        ),
        "."
      ] }),
      /* @__PURE__ */ a.jsxs("div", { className: "tip-wrapper", children: [
        /* @__PURE__ */ a.jsx("span", { className: "tip", children: "Tip" }),
        " Adjust the width of the canvas with the",
        " ",
        /* @__PURE__ */ a.jsx(
          "svg",
          {
            width: "10",
            height: "10",
            viewBox: "0 0 12 12",
            xmlns: "http://www.w3.org/2000/svg",
            children: /* @__PURE__ */ a.jsx("g", { fill: "none", fillRule: "evenodd", children: /* @__PURE__ */ a.jsx(
              "path",
              {
                d: "M1.5 5.2h4.8c.3 0 .5.2.5.4v5.1c-.1.2-.3.3-.4.3H1.4a.5.5 0 01-.5-.4V5.7c0-.3.2-.5.5-.5zm0-2.1h6.9c.3 0 .5.2.5.4v7a.5.5 0 01-1 0V4H1.5a.5.5 0 010-1zm0-2.1h9c.3 0 .5.2.5.4v9.1a.5.5 0 01-1 0V2H1.5a.5.5 0 010-1zm4.3 5.2H2V10h3.8V6.2z",
                id: "a",
                fill: "#999"
              }
            ) })
          }
        ),
        "Viewports addon in the toolbar"
      ] })
    ] })
  ] });
};
export {
  X as Button,
  cr as Header,
  dr as Page
};
//# sourceMappingURL=index.es.js.map
