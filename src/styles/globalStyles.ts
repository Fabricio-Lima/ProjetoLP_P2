import { createGlobalStyle } from "styled-components";

const GlobalStyle = createGlobalStyle`
    * {
        padding: 0;
        margin: 0;
        font-family: 'Roboto',sans-serif;
        font-size: 16px; 
    }

    body {
        background-color: ${({theme}) => theme.colors.background};
    }

`;

export default GlobalStyle;