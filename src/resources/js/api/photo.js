import {callApi} from './apiHelper'
export default{
    getListPhotoUnused(token) {
        return new Promise((resolve, reject) => {
            callApi(token).get('/photo-unused').then(response => {
                resolve(response)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
