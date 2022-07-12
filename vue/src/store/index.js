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
    },
    currentPost: {
      data: {},
    },
    team: {
      team_members: {},
      roles: {},
      departments: {},
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
        commit('setUser', res.data)
      })
    },
    getPosts({ commit }) {
      return axiosClient.get('/blog')
      .then(res => {
        commit('setPosts', res.data)
      });
    },
    getPostBySlug({ commit }, slug) {
      return axiosClient
      .get(`/blog/${slug}`)
      .then((res) => {
        commit("setCurrentPost", res.data);
        return res;
      })
      .catch((err) => {
        throw err;
      });
    },
    getTeamMembers({ commit }) {
      return axiosClient.get('/team')
      .then(res => {
        commit('setTeamMembers', res.data)
      });
    },
    getDepartments({ commit }) {
      return axiosClient.get('/department')
      .then(res => {
        commit('setDepartments', res.data)
      });
    },
    getRoles({ commit }) {
      return axiosClient.get('/studentgrouproles')
      .then(res => {
        commit('setStudentGroupRoles', res.data)
      });
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
    setCurrentPost: (state, currentPost) => {
      state.currentPost = currentPost;
    },
    setTeamMembers: (state, team) => {
      state.team.team_members = team;
    },
    setDepartments: (state, departments) => {
      state.team.departments = departments;
    },
    setStudentGroupRoles: (state, roles) => {
      state.team.roles = roles;
    },
  },
  modules: {},
});

export default store;
