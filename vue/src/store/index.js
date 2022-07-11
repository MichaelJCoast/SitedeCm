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
        commit('setUser', data.user);
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
    getUser({commit}) {
      return axiosClient.get('/user')
      .then(res => {
        console.log(res);
        commit('setUser', res.data)
      })
    },
    getPosts({ commit }) {
      return axiosClient.get('/blog')
      .then(res => {
        console.log(res);
        commit('setPosts', res.data)
      })
    },
  },
  mutations: {
    logout: (state) => {
      state.user.data = {};
      state.user.token = null;
      sessionStorage.removeItem("TOKEN");
    },
    setUser: (state, user) => {
      state.user.data = user;
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem('TOKEN', token);
    },
    setPosts: (state, posts) => {
      state.posts.data = posts;
    },
  },
  modules: {},
});

export default store;
