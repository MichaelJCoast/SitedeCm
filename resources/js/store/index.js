import { createStore } from "vuex";
import axiosClient from "../axios";

function updateLocalStorage(cart) {
  localStorage.setItem("cart", JSON.stringify(cart));
}

const store = createStore({
  state: {
    posts: {
      data: {},
      categories: {},
    },
    currentPost: {
      data: {},
    },
    categories: {
      data: {},
    },
    carousel: {
      data: {},
    },
    team: {
      loading: false,
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
    aboutImage: {
      data: {},
    },
    questions: {
      data: {},
    },
    merch: {
      loading: false,
      products: {},
    },
    currentProduct: {
      data: {},
    },
    order: {
      loading: false,
    },
    cart: [],
  },
  getters: {
    cartItems: (state) => {
      return state.cart;
    },
    productQuantity: (state) => (product, selectedSize) => {
      const item = state.cart.find(i => i.id === product.id && i.selectedSize === selectedSize);

      if (item) {
        return item.quantity;
      }
      else return null;
    },
    cartTotal: (state) => {
      return state.cart.reduce((total, item) => {
        return total + item.price * item.quantity;
      }, 0);
    },
    cartQuantity: (state) => {
      return state.cart.reduce((total, item) => {
        return total + item.quantity;
      }, 0);
    }
  },
  actions: {
    getLatestPosts({ commit }) {
      return axiosClient.get('/blog-latest')
      .then(res => {
        commit('setPosts', res.data)
      });
    },
    getPosts({ commit }) {
      return axiosClient.get('/blog')
      .then(res => {
        commit('setPosts', res.data)
      });
    },
    getCarousel({ commit }) {
      return axiosClient.get('/carousel')
      .then(res => {
        commit('setCarousel', res.data)
      }).catch(err => {
        console.log(err);
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
    verifyOrder({ commit }, verify_token) {
      return axiosClient.get(`/verify-order/${verify_token}`)
      .then((res) => {
        return res;
      })
      .catch((err) => {
        throw err;
      });
    },
    getTeamMembers({ commit }) {
      commit('setTeamLoading', true)
      return axiosClient.get('/team')
      .then(res => {
        commit('setTeamLoading', false)
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
    getAboutImage({ commit }) {
      return axiosClient.get('/aboutimage')
      .then(res => {
        commit('setAboutImage', res.data)
      });
    },
    getMerch({ commit }) {
      commit('setMerchLoading', true)
      return axiosClient.get('/merch')
      .then(res => {
        commit('setMerchLoading', false)
        commit('setMerch', res.data)
      });
    },
    getProductById({ commit }, id) {
      commit('setMerchLoading', true)
      return axiosClient
      .get(`/merch/${id}`)
      .then((res) => {
        commit('setMerchLoading', false)
        commit("setCurrentProduct", res.data);
        return res;
      })
      .catch((err) => {
        throw err;
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
    submitOrder({ commit }, order) {
      commit('setOrderLoading', true)
      return axiosClient.post('/order', order)
      .then(res => {
        commit('setCart', [])
        return res;
      })
      .catch((err) => {
        throw err;
      });
    }
},
  mutations: {
    setPosts: (state, posts) => {
      state.posts.data = posts;
    },
    setCarousel: (state, carousel) => {
      state.carousel.data = carousel;
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
    setAboutImage: (state, aboutImage) => {
      state.aboutImage.data = aboutImage;
    },
    setMerch: (state, merch) => {
      state.merch.products = merch;
    },
    setCurrentProduct: (state, currentProduct) => {
      state.currentProduct = currentProduct;
    },
    setCart: (state, cart) => { 
      state.cart = cart;
      updateLocalStorage(cart);
    },
    addToCart(state, {product, selectedSize}) {
      const item = state.cart.find(i => i.id === product.id && i.selectedSize === selectedSize);

      if (item) {
        item.quantity++;
      }
      else {
        state.cart.push({...product, quantity: 1, selectedSize});
      }

      updateLocalStorage(state.cart);
    },
    removeFromCart (state, {product, selectedSize}) {
      const item = state.cart.find(i => i.id === product.id && i.selectedSize === selectedSize);
      if (item) {
        if (item.quantity > 1) {
          item.quantity--
        } else {
          state.cart = state.cart.filter(i => i.id !== product.id || i.selectedSize !== selectedSize);
        }
      }
      updateLocalStorage(state.cart)
    },
    updateCartFromLocalStorage(state) {
      const cart = localStorage.getItem('cart')
      if (cart) {
        state.cart = JSON.parse(cart)
      }
    },
    setMandates: (state, mandates) => {
      state.team.mandates = mandates;
    },
    setCategories: (state, categories) => {
      state.posts.categories = categories;
    },
    setMerchLoading: (state, loading) => {
      state.merch.loading = loading;
    },
    setTeamLoading: (state, loading) => {
      state.team.loading = loading;
    },
    setOrderLoading: (state, loading) => {
      state.order.loading = loading;
    }
  },
  modules: {}
});

export default store;