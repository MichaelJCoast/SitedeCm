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
    },
    about: {
      data: {},
    },
    questions: {
      data: {},
    },
    merch: {
      products: {},
    },
    currentProduct: {
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
    getQuestions({ commit }) {
      return axiosClient.get('/faq')
      .then(res => {
        commit('setQuestions', res.data)
      });
    },
    getAbout({ commit }) {
      return axiosClient.get('/about')
      .then(res => {
        commit('setAbout', res.data)
      });
    },
    getMerch({ commit }) {
      return axiosClient.get('/merch')
      .then(res => {
        commit('setMerch', res.data)
      });
    },
    getProductById({ commit }, id) {
      return axiosClient
      .get(`/merch/${id}`)
      .then((res) => {
        commit("setCurrentProduct", res.data);
        return res;
      })
      .catch((err) => {
        throw err;
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
    setQuestions: (state, questions) => {
      state.questions.data = questions;
    },
    setAbout: (state, about) => {
      state.about.data = about;
    },
    setMerch: (state, merch) => {
      state.merch.products = merch;
    },
    setCurrentProduct: (state, currentProduct) => {
      state.currentProduct = currentProduct;
    },
  },
  modules: {},
});

export default store;