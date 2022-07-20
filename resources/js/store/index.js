import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    posts: {
      data: {},
      categories: {},
    },
    currentPost: {
      data: {},
    },
    team: {
      team_members: {},
      roles: {},
      departments: {},
      mandates: {},
    },
    links: {
      data: {},
    },
    about: {
      data: {},
    },
    questions: {
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
    getMandates({ commit }) {
      return axiosClient.get('/mandato')
      .then(res => {
        commit('setMandates', res.data)
      });
    },
    getCategories({ commit }) {
      return axiosClient.get('/categories')
      .then(res => {
        commit('setCategories', res.data)
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
    setMandates: (state, mandates) => {
      state.team.mandates = mandates;
    },
    setCategories: (state, categories) => {
      state.posts.categories = categories;
    },
  },
  modules: {},
});

export default store;