import {callApi} from './apiHelper'
export default{
    sendContact(token, data) {
        return new Promise((resolve, reject) => {
            callApi(token).post('/contact', data).then(response => {
                resolve(response)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
