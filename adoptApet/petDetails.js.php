function loadAgent(agentName){
    if(window.agent){
        window.agent.stop();
        window.agent.hide();
    }

    clippy.load(agentName, function(clippysAgent){
        window.agent = clippysAgent;
        window.agent.show();
        window.agent.moveTo( 200, 200 );
    });
}


