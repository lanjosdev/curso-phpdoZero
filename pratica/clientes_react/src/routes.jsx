// Funcionalidades / Libs:
import { Routes, Route } from "react-router-dom";

// Pages:
import Clientes from "./pages/clientes";
import Cadastro from "./pages/cadastro";

// Components:
// import PrivateRoute from "./utils/PrivateRoute";


export default function AppRoutes() {
    return (
        <Routes>
            <Route path="/" element={ <Clientes /> } />
            
            <Route path="/cadastro" element={ <Cadastro /> } />
        </Routes>
    )
}