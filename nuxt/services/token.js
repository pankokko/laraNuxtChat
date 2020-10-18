export const SetCookie = (token, cookie) => {
  cookie.set('jwt', token, {
    path: '/',
    maxAge: 60 * 60
  })
}

export const GetCookie = (token, cookie) => {
 return cookie.get(token)
}

