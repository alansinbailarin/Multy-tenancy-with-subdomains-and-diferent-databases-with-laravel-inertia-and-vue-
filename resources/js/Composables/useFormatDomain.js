import { ref } from "vue";

export const useDomainFormatter = () => {
    const formattedDomain = ref("");

    const formatDomain = (domain) => {
        // Elimina espacios al principio y al final
        let formatted = domain.trim();

        // Elimina "http://" o "https://"
        formatted = formatted.replace(/^(https?:\/\/)?/i, "");

        // Reemplaza espacios por "-"
        formatted = formatted.replace(/\s+/g, "-");

        // Elimina caracteres especiales y puntos
        formatted = formatted.replace(/[^\w\d-]/g, "");

        formattedDomain.value = formatted;
    };

    return { formattedDomain, formatDomain };
};
