export const GetAuthUser = ( state ) =>{
    return state.user
}

export const GetAuthToken = ( state ) =>{
    return state.token
}

export const GetAuthTokenAxios = ( state ) =>{
    return { headers:{'Authorization':('bearer' + state.token)}}
}