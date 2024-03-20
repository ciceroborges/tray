export const helpers = {
    
    getMoney: (value) => {
        return (value / 100).toLocaleString('pt-BR', {
            style: 'currency',
            currency: 'BRL',
        });   
    },
    
    getDate: (date) => {
        return new Date(date).toLocaleString('pt-BR', {
            timeZone: 'America/Sao_Paulo',
            day: 'numeric',
            month: 'numeric',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
        });
    }
    
}