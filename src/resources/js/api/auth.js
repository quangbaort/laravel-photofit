import {callApi} from './apiHelper'
export default{
    login(token, data) {
        return new Promise((resolve, reject) => {
            callApi(token).post('/login', data).then(response => {
                resolve(response)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getCurrentUser(token){
        return new Promise((resolve, reject) => {
            callApi(token).get('/user-info').then(response => {
                resolve(response)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
