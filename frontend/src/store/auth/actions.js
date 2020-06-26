export const loginUser = (context, data) => {
  let accessToken = data.access_token;
  let tokenType = data.token_type;
  let user = data.user;

  localStorage.setItem('accessToken', accessToken);
  localStorage.setItem('tokenType', tokenType);
  localStorage.setItem('user', JSON.stringify(user));
  context.commit('loginUserMutation', data);
}

export const logoutUser = (context, data) => {
  localStorage.removeItem('accessToken');
  localStorage.removeItem('tokenType');
  localStorage.removeItem('user');
  context.commit('logoutUserMutation', data);
}
