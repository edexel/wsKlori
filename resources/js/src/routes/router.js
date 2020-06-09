import React from "react";
// componentes de la App
import { HomePage } from "../pages/home/HomePage";
import { LoginPage } from '../pages/login/LoginPage';

const routes = {
  "/": () => <HomePage />,
  "/login": () => <LoginPage />,
};
export default routes;