export const loginUserMutation = (state, data) => {
  state.accessToken = data.access_token;
  state.user = data.user;
  state.tokenType = data.token_type;
}

export const logoutUserMutation = (state, data) => {
  state.tokenType = null;
  state.user = null;
  state.tokenType = null;
}


