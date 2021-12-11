import { ThemeProvider } from "styled-components";

import { Router } from "react-router-dom";

import { theme } from './styles/theme';
import GlobalStyle from './styles/globalStyles';

function App() {
    return (
        <ThemeProvider theme={theme}>
            <GlobalStyle />
            <Router />
        </ThemeProvider>
)};

export default App;