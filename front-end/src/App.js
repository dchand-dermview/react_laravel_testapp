import './App.css';
import {BrowserRouter as Router, Routes, Route} from 'react-router-dom';
import Home from "./pages/home/index";
import ErrorPage from "./pages/errorpage/index";

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Home />}/>
                <Route path="*" element={<ErrorPage />}/>
            </Routes>
        </Router>
    );
}

export default App;