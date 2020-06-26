
export const loadAllPosts = (context, data) => {
  context.commit('loadAllPostsMutation', data);
}

export const loadAllMyPosts = (context, data) => {
  context.commit('loadAllMyPostsMutation',data);
}

export const savePost = (context, data) => {
  //console.log(data);
}
