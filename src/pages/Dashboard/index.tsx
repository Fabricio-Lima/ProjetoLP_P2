import Header from "../../components/Header";

import {
    DashboardBackground,
    BodyContainer,
    InLineTitle,
    InLineContainer
} from './styles';

const Dashboard = () => {
    return (
        <DashboardBackground>
            <Header />
            <BodyContainer>
                <InLineContainer>
                    <InLineTitle>
                        
                    </InLineTitle>
                </InLineContainer>
            </BodyContainer>
        </DashboardBackground>
    )
}

export default Dashboard;