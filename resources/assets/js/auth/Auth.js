import { parse } from "querystring";
import Axios from "axios";

export default function (Vue) {
    
    Vue.auth = {
        setToken: (token, user, expiration) => {
            localStorage.setItem('token', token);
            localStorage.setItem('user', JSON.stringify(user));
            localStorage.setItem('expiration', expiration);

            Axios.defaults.headers.common['Authorization'] = 'Bearer' + token;

        },
        getToken() {
            var token = localStorage.getItem('token')
            var expiration = localStorage.getItem('expiration')

            if(!token || ! expiration) 
                return null
            if(Date.now() > parse(expiration)) {
                this.destroyToken()
                return null
            } else
                return token
        },
        destroyToken() {
            localStorage.removeItem('token')
            localStorage.removeItem('expiration')
            localStorage.removeItem('user')
        },
        isAuth() {
            if(this.getToken()) 
                return true
            else
                return false
        }
    }
    Object.defineProperties(Vue.prototype, {
        $auth: {
            get:() => {
                return Vue.auth
            }
        }
    })
}