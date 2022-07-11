import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    },
    posts: {
      data: {},
    }
  },
  getters: {},
  actions: {
    register({ commit }, user) {
      return axiosClient.post("/register", user).then(({ data }) => {
        commit('setUser', data.user);
        commit('setToken', data.token)
        return data;
      });
    },
    login({ commit }, user) {
      return axiosClient.post("/login", user).then(({ data }) => {
        commit("setUser", data.user);
        commit('setToken', data.token)
        return data;
      });
    },
    logout({ commit }) {
      return axiosClient.post('/logout')
      .then( response => {
        commit('logout')
        return response;
      });
    },
    getPosts({ commit }, {url = null} = {}) {
      url = url || "/post";
      return axiosClient.get(url).then((res) => {
        commit("setPosts", res.data);
        return res;
      });
    },
  },
  mutations: {
    logout: (state) => {
      state.user.data = {};
      state.user.token = null;
      sessionStorage.removeItem("TOKEN");
    },
    setUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      sessionStorage.setItem("TOKEN", userData.token);
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem('TOKEN', token);
    },
    setPosts: (state, posts) => {
      state.posts.data = posts.data;
    },
  },
  modules: {},
});

export default store;
