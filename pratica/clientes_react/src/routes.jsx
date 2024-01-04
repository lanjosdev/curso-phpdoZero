// Funcionalidades / Libs:
import { Routes, Route } from "react-router-dom";

// Pages:
import Clientes from "./pages/clientes";
import Cadastro from "./pages/RegistraCliente";
import DeletaCliente from "./pages/DeleteCliente";
import EditaCliente from "./pages/EditaCliente";

// Components:
// import PrivateRoute from "./utils/PrivateRoute";


export default function AppRoutes() {
    return (
        <Routes>
            <Route path="/" element={ <Clientes /> } />
            
            <Route path="/registra" element={ <Cadastro /> } />

            <Route path="/delete/:idCliente" element={ <DeletaCliente /> } />

            <Route path="/edite/:idCliente" element={ <EditaCliente /> } />
        </Routes>
    )
}