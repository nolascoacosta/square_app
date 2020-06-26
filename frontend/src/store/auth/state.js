export default function () {
  return {
    accessToken: localStorage.getItem('accessToken') || null,
    tokenType: localStorage.getItem('accessToken') || null,
    user: JSON.parse(localStorage.getItem('user')) || null,
  }
}
