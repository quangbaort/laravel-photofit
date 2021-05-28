import Vue from 'vue'
import VueRouter from 'vue-router';
import home from "./pages/home";
import about from  "./pages/about";
import QA from "./pages/QA";
import menu from  "./pages/menu";
import layouter from  "./pages/layouter";
import guide from  "./pages/guide";
import contact from  "./pages/contact";
import confirmContact from  "./pages/confirmContact";
import PageNotFound from './pages/404.vue';
import imageUnused from './pages/imageUnused.vue';
import mypage from  "./pages/mypage/index";
import customer from  "./pages/mypage/customer";
import orderHistory from './pages/mypage/orderHistory';
import cart from './pages/mypage/cart';
import product from './pages/product/index';
import selectSize from './pages/product/selectSize'
import selectBackground from './pages/product/selectBackground'
import auth from './middlewares/checkAuth'

Vue.use(VueRouter);
const router = new VueRouter({
    routes : [
        {path : '/top' , component : home , name : "home"},
        {path : '/' , component : home , name : "top"},
        {path : '/about' , component : about , name : "about"},
        {path : '/question-and-answer' , component : QA , name : "QA"},
        {path : '/menu' , component : menu , name : "menu"},
        {path : '/layouter' , component : layouter , name : "layouter"},
        {path : '/guide' , component : guide , name : "guide"},
        {path : '/contact' , component : contact , name : "contact"},
        {path : '/confirm-contact' , component : confirmContact , name : "confirm-contact"},
        {path : '/my-page' , component : mypage , name : "mypage", meta: {middleware: [auth]}},
        {path : '/my-page/customer' , component : customer , name : "customer", meta: {middleware: [auth]}},
        {path : '/my-page/order-history' , component : orderHistory , name : "orderHistory", meta: {middleware: [auth]}},
        {path : '/my-page/cart' , component : cart , name : "cart", meta: {middleware: [auth]}},
        {path : '/product/:product' , component : product , name : "product"},
        {path : '/product/:product/:gotoSize' , component : selectSize , name : 'selectSize' , meta: {middleware: [auth]}},
        {path : '/image-unused' , component : imageUnused , name : "imageUnused", meta: {middleware: [auth]}},
        {path : '/product/:product/:gotoBackground' , component : selectBackground , name : "selectBackground", meta: {middleware: [auth]}},

        {path: "*", component: PageNotFound }
    ],
    mode : 'history',
})
function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index];
    if (!subsequentMiddleware) return context.next;
    return (...parameters) => {
        context.next(...parameters);
        const nextMiddleware = nextFactory(context, middleware, index + 1);
        subsequentMiddleware({ ...context, next: nextMiddleware });
    };
}
router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];
        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({ ...context, next: nextMiddleware });
    }
    return next();
});

export default router