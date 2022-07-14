import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
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
    },
    links: {
      data: {},
    }
  },
  getters: {},
  actions: {
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
    getLinks({ commit }) {
      return axiosClient.get('/links')
      .then(res => {
        commit('setLinks', res.data)
      });
    },
},
  mutations: {
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
    setLinks: (state, links) => {
      state.links.data = links;
    },
  },
  modules: {},
});

export default store;